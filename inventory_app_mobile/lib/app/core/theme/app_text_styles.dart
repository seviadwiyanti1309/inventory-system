import 'package:flutter/material.dart';
import 'app_colors.dart';

class AppTextStyles {
  static const TextStyle appBarTitle = TextStyle(
    color: AppColors.primary,
    fontWeight: FontWeight.bold,
    fontSize: 18,
  );

  static const TextStyle itemTitle = TextStyle(
    fontWeight: FontWeight.w600,
    fontSize: 15,
    color: AppColors.textPrimary,
  );

  static const TextStyle categoryDetail = TextStyle(
    color: AppColors.accent,
    fontSize: 11,
    fontWeight: FontWeight.w500,
  );

  static const TextStyle stockBadge = TextStyle(
    fontSize: 12,
    fontWeight: FontWeight.bold,
  );

  static const TextStyle detailHeader = TextStyle(
    fontSize: 20,
    fontWeight: FontWeight.bold,
    color: AppColors.textPrimary,
  );

  static const TextStyle labelSmall = TextStyle(
    fontWeight: FontWeight.bold,
    fontSize: 14,
    color: AppColors.textSecondary,
  );

  static const TextStyle infoValue = TextStyle(
    fontWeight: FontWeight.w600,
    fontSize: 14,
    color: AppColors.textPrimary,
  );
}
