<?php

if (
    isset($_POST["last_name"]) && $_POST["last_name"] != "" &&
    isset($_POST["first_name"]) && $_POST["first_name"] != "" &&
    isset($_POST["last_name_kana"]) && $_POST["last_name_kana"] != "" &&
    isset($_POST["first_name_kana"]) && $_POST["last_name_kana"] != "" &&
    isset($_POST["address_num1"]) && $_POST["address_num1"] != "" &&
    isset($_POST["address_num2"]) && $_POST["address_num2"] != "" &&
    isset($_POST["address"]) && $_POST["address"] != "" &&
    isset($_POST["tel_num1"]) && $_POST["tel_num1"] != "" &&
    isset($_POST["tel_num2"]) && $_POST["tel_num2"] != "" &&
    isset($_POST["tel_num3"]) && $_POST["tel_num3"] != "" &&
    isset($_POST["mail"]) && $_POST["mail"] != "" &&
    isset($_POST["content"]) && $_POST["content"] != ""
) {

    $last_name = $_POST["last_name"];
    $first_name = $_POST["first_name"];
    $last_name_kana = $_POST["last_name_kana"];
    $first_name_kana = $_POST["first_name_kana"];
    $address_num1 = $_POST["address_num1"];
    $address_num2 = $_POST["address_num2"];
    $address = $_POST["address"];
    $tel_num1 = $_POST["tel_num1"];
    $tel_num2 = $_POST["tel_num2"];
    $tel_num3 = $_POST["tel_num3"];
    $mail = $_POST["mail"];
    $content = $_POST["content"];

} else {
    header("location:../index.php");
    goto end;
}

$name = $last_name . " " . $first_name;
$name_kana = $last_name_kana . " " . $first_name_kana;
$address_num = $address_num1 . "-" . $address_num2;
$tel = $tel_num1 . "-" . $tel_num2 . "-" . $tel_num3;

try {
    require_once("./DBInfo.php");
    $pdo = new PDO(DBInfo::DNS, DBInfo::USER, DBInfo::PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "insert into submitted values(NULL,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $name_kana);
    $stmt->bindValue(3, $address_num);
    $stmt->bindValue(4, $address);
    $stmt->bindValue(5, $tel);
    $stmt->bindValue(6, $mail);
    $stmt->bindValue(7, $content);


    $pdo->beginTransaction();
    $stmt->execute();
    $pdo->commit();

    $pdo = null;
    header("content-type:text/html; charset=UTF-8");
    print "success";

} catch (PDOException $e) {
    if (isset($pdo) == true && $pdo->inTransaction() == true) {
        $pdo->rollBack();
    }


    $pdo = null;
    header("content-type:text/html; charset=UTF-8");
    print "fail";
}


end: