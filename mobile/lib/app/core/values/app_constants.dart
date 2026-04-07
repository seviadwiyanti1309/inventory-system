import 'dart:io';

class AppConstants {
  /// Base URL API.
  /// Menggunakan 10.0.2.2 untuk emulator Android dan 127.0.0.1 untuk iOS/Desktop.
  static String get baseUrl => Platform.isAndroid 
      ? 'http://10.0.2.2:8000/api' 
      : 'http://127.0.0.1:8000/api';
      
  /// Timeout untuk request API (opsional, untuk pengembangan selanjutnya)
  static const Duration timeout = Duration(seconds: 30);
}
