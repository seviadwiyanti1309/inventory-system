import 'package:get/get.dart';
import '../../data/models/item_model.dart';
import '../../data/repositories/item_repository.dart';

class HomeController extends GetxController {
  final ItemRepository _repository;

  HomeController(this._repository);

  final items = <ItemModel>[].obs;
  final isLoading = true.obs;
  final errorMessage = ''.obs;
  final searchQuery = ''.obs;

  List<ItemModel> get filteredItems {
    if (searchQuery.value.isEmpty) return items;
    return items.where((item) =>
      item.name.toLowerCase().contains(searchQuery.value.toLowerCase()) ||
      (item.category?.name.toLowerCase().contains(searchQuery.value.toLowerCase()) ?? false)
    ).toList();
  }

  @override
  void onInit() {
    super.onInit();
    fetchItems();
  }

  Future<void> fetchItems() async {
    try {
      isLoading(true);
      errorMessage('');
      final result = await _repository.getItems();
      items.assignAll(result);
    } catch (e) {
      errorMessage(e.toString().replaceAll('Exception: ', ''));
    } finally {
      isLoading(false);
    }
  }

  void onSearch(String query) {
    searchQuery(query);
  }

  void goToDetail(ItemModel item) {
    Get.toNamed('/detail', arguments: item);
  }
}