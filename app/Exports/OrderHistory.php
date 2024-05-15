<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderHistory implements FromCollection, WithHeadings
{
    protected $ticket_no;

    protected $order_no;

    public function __construct($ticket_no = null,$order_no=null)
    {
        $this->ticket_no = $ticket_no;
        $this->order_no = $order_no;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tickets = Order::with('user');
        $tickets = $tickets->when($this->order_no, function ($query) {
            $query->where('order_no', $this->order_no);
        });
        $tickets = $tickets->when($this->ticket_no, function ($query) {
            $query->whereJsonContains('ticket_no', $this->ticket_no);
        });

        $tickets = $tickets->get();

        $exportData = new Collection();
        $serial_no = 1;
        foreach ($tickets as $ticket) {
            $json_ticket_no = json_decode($ticket->ticket_no, true); // Decode JSON string to array
            $json_chances = json_decode($ticket->chances, true); // Decode JSON string to array
            if (is_array($json_ticket_no)) {
                foreach ($json_ticket_no as $key => $ticket_no) {
                    if($this->ticket_no == $ticket_no) {
                        $exportData->push([
                            'S.No' => $serial_no,
                            'Name' => $ticket->user->name,
                            'Ticket amount' => $ticket->ticket_amount,
                            'Ticket no' => $ticket_no,
                            'Chances' => $json_chances[$key],
                            'Total amount' => $ticket->ticket_amount * $json_chances[$key],
                            'Payment status' => $ticket->payment_status,
                            'Placed at' => date('d-m-Y',strtotime($ticket->created_at))
                        ]);
                        $serial_no++;
                    }
                }
            }
        }
        return $exportData;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Ticket amount',
            'Ticket no',
            'Chances',
            'Total amount',
            'Payment status',
            'Placed at'
        ];
    }
}
