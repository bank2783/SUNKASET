<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use App\Models\Sold_history;



class SoldHistoryExport implements FromCollection, WithHeadings

{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $type;




    public function columnFormats(): array
{
    return [
        'H' => NumberFormat::FORMAT_DATE_DATETIME
    ];
}

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function map($soldHistory): array
{
    return [
        $soldHistory->id,
        $soldHistory->product_name,
        $soldHistory->product_price,
        $soldHistory->product_mount,
        $soldHistory->user-> first_name, // เพิ่ม column ชื่อผู้ใช้งาน
        $soldHistory->user-> last_name, // เพิ่ม column ชื่อผู้ใช้งาน
        $soldHistory->market->market_name,
        Carbon::parse($soldHistory->created_at)->format('Y-m-d H:i:s'),
        ];



}

    public function headings(): array
    {
        return [
            'ID',
            'ชื่อสินค้า',
            'ราคารวม',
            'จำนวน',
            'ชื่อจริง',
            'นามสกุล',
            'ชื่อร้านค้า',
            'วันที่',

        ];
    }

    public function collection()
    {
        $type = request()->input('type', 'daily');
        $query = Sold_history::query()->select('sold_histories.*', 'users.first_name', 'markets.market_name');
        if ($type == 'daily') {
            $query->whereDate('sold_histories.created_at', Carbon::today());
        } elseif ($type == 'monthly') {
            $query->whereYear('sold_histories.created_at', Carbon::now()->year)
                ->whereMonth('sold_histories.created_at', Carbon::now()->month);
        } elseif ($type == 'yearly') {
            $query->whereYear('sold_histories.created_at', Carbon::now()->year);
        }
        $data = $query->join('users', 'users.id', '=', 'sold_histories.user_id')
            ->join('markets', 'markets.id', '=', 'sold_histories.market_id')

            ->select(['sold_histories.id', 'sold_histories.product_name', 'sold_histories.product_price', 'sold_histories.product_mount',  'users.first_name','users.last_name', 'markets.market_name','sold_histories.created_at'])
            ->get();

            // dd($data);

        return $data;
    }



}

