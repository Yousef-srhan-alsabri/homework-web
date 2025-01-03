<?php
// إذا تم الإرسال باستخدام get
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $name = htmlspecialchars($_GET['name']);
    $age = htmlspecialchars($_GET['age']);
    echo "Name = $name <br/> Age = $age";
}

// إذا تم الإرسال باستخدام post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    echo "Name = $name <br/> Age = $age";
}



echo "<pre dir='rtl'>الخاصية                                  POST                                       GET
طريقة النقل	البيانات                 تُرسل ضمن عنوان URL.                           البيانات تُرسل في جسم الطلب.
الخصوصية                      أقل أمانًا، حيث يمكن رؤية البيانات في العنوان.             أكثر أمانًا لأن البيانات غير مرئية في العنوان.
الطول                         محدود بسبب طول عنوان URL.                       غير محدود عمليًا.
الاستخدام                       لطلبات جلب البيانات (Read) فقط.                    لطلبات تعديل أو إرسال بيانات (Create, Update).
الكاش                         يمكن تخزين الطلب في الكاش.                        لا يمكن تخزين الطلب في الكاش.
سهولة الاختبار                   يمكن اختبارها بسهولة عبر المتصفح.                    تحتاج أدوات مثل Postman للاختبار.";
echo "</pre>";
?>