import 'package:get/get.dart';
import '../../data/models/item_model.dart';

class DetailController extends GetxController {
  late ItemModel item;

  @override
  void onInit() {
    super.onInit();
    item = Get.arguments as ItemModel;
  }
}