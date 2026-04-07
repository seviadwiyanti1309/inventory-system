import 'dart:convert';
import 'package:http/http.dart' as http;
import '../models/item_model.dart';
import '../../core/values/app_constants.dart';

class ItemProvider {
  final String baseUrl = AppConstants.baseUrl;


  Future<List<ItemModel>> getItems() async {
    try {
      final response = await http.get(Uri.parse('$baseUrl/items'));

      if (response.statusCode == 200) {
        final decoded = jsonDecode(response.body);
        
        List rawData = [];
        if (decoded is List) {
          rawData = decoded;
        } else if (decoded is Map && decoded.containsKey('data')) {
          rawData = decoded['data'];
        }

        return rawData.map((e) => ItemModel.fromJson(e)).toList();
      } else {
        throw 'Gagal mengambil data dari server (${response.statusCode})';
      }
    } catch (e) {
      throw 'Gagal memproses data items: $e';
    }
  }

  Future<ItemModel> getItemDetail(int id) async {
    try {
      final response = await http.get(Uri.parse('$baseUrl/items/$id'));

      if (response.statusCode == 200) {
        final decoded = jsonDecode(response.body);
        final data = (decoded is Map && decoded.containsKey('data')) 
            ? decoded['data'] 
            : decoded;
        return ItemModel.fromJson(data);
      } else {
        throw 'Gagal mengambil detail item (${response.statusCode})';
      }
    } catch (e) {
      throw 'Gagal memproses detail item: $e';
    }
  }
}