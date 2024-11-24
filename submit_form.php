<?php
// მონაცემების მიღება
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // მონაცემების უსაფრთხოება და წმენდა
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));

    // მონაცემების ვალიდაცია
    if (!empty($name) && !empty($surname) && !empty($phone) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // მაგალითი: ელფოსტის გაგზავნა
        $to = "gagaiveroon@gmail.com"; // თქვენი ელფოსტის მისამართი
        $subject = "კონტაქტის ფორმის შეტყობინება";
        $message = "
            <h2>ახალი შეტყობინება კონტაქტის ფორმიდან:</h2>
            <p><strong>სახელი:</strong> $name</p>
            <p><strong>გვარი:</strong> $surname</p>
            <p><strong>ტელეფონი:</strong> $phone</p>
            <p><strong>ელექტრონული ფოსტა:</strong> $email</p>
        ";

        // ელფოსტის ბარები
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: $email" . "\r\n";

        // ელფოსტის გაგზავნა
        if (mail($to, $subject, $message, $headers)) {
            echo "შეტყობინება წარმატებით გაიგზავნა. გმადლობთ!";
        } else {
            echo "შეტყობინების გაგზავნა ვერ მოხერხდა. სცადეთ თავიდან.";
        }

    } else {
        echo "გთხოვთ, შეავსოთ ყველა ველი სწორად.";
    }
} else {
    echo "არასწორი მოთხოვნა.";
}
?>
