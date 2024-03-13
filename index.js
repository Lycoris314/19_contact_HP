
window.onload = common;

function common() {

    //お問い合わせフォームをクリック
    const to_form = document.getElementById("to_form");
    const form = document.getElementById("form");
    const backdrop = document.querySelector(".backdrop");

    to_form.onclick = function () {

        form.showModal();
        form.style.opacity = "1";
        //背景
        backdrop.style.display = "block";
        setTimeout(() => {
            backdrop.style.backgroundColor = "rgba(255,255,255,0.7)"
        }, 10);

    };
    //閉じるボタンをクリック
    const close_btn = document.getElementById("close_btn");

    close_btn.onclick = function () {

        form.style.opacity = "0";
        backdrop.style.backgroundColor = "rgba(255,255,255,0)"

        setTimeout(() => {
            form.close();
            backdrop.style.display = "none";
        }, 600);
    }

    //送信後の画面の閉じるボタンをクリック
    const close_btn2 = document.getElementById("close_btn2");
    const submitted = document.getElementById("submitted");

    close_btn2.onclick = function () {

        submitted.style.opacity = "0";
        setTimeout(() => {
            submitted.close();
            submitted.style.opacity = "1";
        }, 600);
    };

    //確認用メールアドレスのバリデーション
    const mail = document.getElementById("mail");
    const mail2 = document.getElementById("mail2");
    const reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    mail.addEventListener("change", onChange);
    mail2.addEventListener("change", onChange);

    function onChange() {
        if (mail2.value != "" && reg.test(mail2.value) && mail2.value != mail.value) {
            mail2.setCustomValidity("メールアドレスが確認用と異なっています。");
        }
        else {
            mail2.setCustomValidity("");
        }
    }


    //入力中は消しておく
    mail.addEventListener("input", onInput);
    mail2.addEventListener("input", onInput);
    function onInput() {
        mail2.setCustomValidity("");
    }



    //送信ボタンをクリック
    document.querySelector("form").onsubmit = function (e) {
        e.preventDefault();

        if (mail2.value == mail.value) {

            const parameter = $("form").serialize();
            const text = document.querySelector("#submitted p");

            $.ajax({
                url: "./system/system.php",
                type: "post",
                data: parameter,
                cache: false,

            }).done((data) => {
                if (data == "success") {
                    text.innerHTML = "質問を受付けました";
                } else {
                    text.innerHTML = "エラーが発生しました";
                }
            }).fail(() => {
                text.innerHTML = "エラーが発生しました";
            }).always(() => {
                document.getElementById("submitted").showModal();
            })
        }
    };
};
