import 'package:get/get.dart';
import '../modules/home/home_view.dart';
import '../modules/home/home_controller.dart';
import '../modules/detail/detail_view.dart';
import '../modules/detail/detail_controller.dart';
import '../data/providers/item_provider.dart';
import '../data/repositories/item_repository.dart';

class AppRoutes {
  static const home = '/';
  static const detail = '/detail';

  static final routes = [
    GetPage(
      name: home,
      page: () => const HomeView(),
      binding: BindingsBuilder(() {
        Get.lazyPut(() => ItemProvider());
        Get.lazyPut<ItemRepository>(() => ItemRepositoryImpl(Get.find()));
        Get.lazyPut(() => HomeController(Get.find()));
      }),
    ),
    GetPage(
      name: detail,
      page: () => const DetailView(),
      binding: BindingsBuilder(() {
        Get.lazyPut(() => DetailController());
      }),
    ),
  ];
}