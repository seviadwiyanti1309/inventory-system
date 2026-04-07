import 'category_model.dart';

class ItemModel {
  final int id;
  final String name;
  final int stock;
  final String unit;
  final double price;
  final String? description;
  final CategoryModel? category;

  ItemModel({
    required this.id,
    required this.name,
    required this.stock,
    required this.unit,
    required this.price,
    this.description,
    this.category,
  });

  factory ItemModel.fromJson(Map<String, dynamic> json) {
    return ItemModel(
      id: int.tryParse(json['id'].toString()) ?? 0,
      name: json['name'] ?? '',
      stock: int.tryParse(json['stock'].toString()) ?? 0,
      unit: json['unit'] ?? 'pcs',
      price: double.tryParse(json['price'].toString()) ?? 0.0,
      description: json['description'],
      category: json['category'] != null
          ? CategoryModel.fromJson(json['category'])
          : null,
    );
  }
}