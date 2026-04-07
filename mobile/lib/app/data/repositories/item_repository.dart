import '../models/item_model.dart';
import '../providers/item_provider.dart';

abstract class ItemRepository {
  Future<List<ItemModel>> getItems();
  Future<ItemModel> getItemDetail(int id);
}

class ItemRepositoryImpl implements ItemRepository {
  final ItemProvider _provider;

  ItemRepositoryImpl(this._provider);

  @override
  Future<List<ItemModel>> getItems() async {
    return await _provider.getItems();
  }

  @override
  Future<ItemModel> getItemDetail(int id) async {
    return await _provider.getItemDetail(id);
  }
}
