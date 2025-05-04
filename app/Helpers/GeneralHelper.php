<?php

use App\Models\stocks;
use App\Models\StockTransactions;

if (!function_exists('rupiah')) {
  function rupiah($number)
  {
    return 'Rp. ' . number_format($number, 0, ',', '.');
  }
}

if (!function_exists('update_stock')) {
  /**
   * Update stok berdasarkan transaksi masuk/keluar
   *
   * @param int $productId
   * @param float $qty
   * @param string $type 'in' atau 'out'
   * @return void
   */
  function recalculateStock($productId)
  {
    $final = StockTransactions::where('product_id', $productId)->sum('quantity');
    // $in = StockTransactions::where('product_id', $productId)->where('type', 'in')->sum('quantity');
    // $out = StockTransactions::where('product_id', $productId)->where('type', 'out')->sum('quantity');
    // $adj = StockTransactions::where('product_id', $productId)->where('type', 'adjustment')->sum('quantity');

    // $final = $in + $out + $adj;

    // Cegah stok negatif (optional, tergantung kebijakan kamu)
    if ($final < 0) {
      $final = 0;
    }

    stocks::updateOrCreate(
      ['product_id' => $productId],
      ['quantity' => $final]
    );

  }
}