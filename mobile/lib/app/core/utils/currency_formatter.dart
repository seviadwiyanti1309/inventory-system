class CurrencyFormatter {
  static String formatRupiah(double price) {
    final parts = price.toStringAsFixed(0).split('');
    String result = '';
    int count = 0;
    for (int i = parts.length - 1; i >= 0; i--) {
      if (count > 0 && count % 3 == 0) result = '.$result';
      result = parts[i] + result;
      count++;
    }
    return 'Rp $result';
  }
}
