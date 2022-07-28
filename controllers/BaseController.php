<?php
class BaseController
{
  protected $folder; // Biến có giá trị là thư mục nào đó trong thư mục views, chứa các file view template của phần đang truy cập.
  
  // Hàm hiển thị kết quả ra cho người dùng.
  function render($file)
  {
    // Kiểm tra file gọi đến có tồn tại hay không?
    $view_file = 'views/' . $this->folder . '/' . $file . '.php';
    if (is_file($view_file)) {
      ob_start();
      require_once($view_file);
      $content = ob_get_clean();
      // Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống đế hiển thị ra cho người dùng
      require_once('views/layouts/application.php');
    } else {
      // Nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi.
      header('Location: index.php?controller=pages&action=error');
    }
  }
}
