<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Product::select('type', 'name', 'sku', 'quantity', 'quantity_xs',
      'quantity_s',
      'quantity_m',
      'quantity_l',
      'quantity_xl',
      'quantity_xxl',
      'quantity_xxxl')->where('notify', 1)->get();
  }

  public function headings(): array
  {
    return [

      'type',
      'name',
      'sku',
      'quantity',
      'quantity_xs',
      'quantity_s',
      'quantity_m',
      'quantity_l',
      'quantity_xl',
      'quantity_xxl',
      'quantity_xxxl',
    ];
  }
}
