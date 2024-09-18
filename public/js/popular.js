// 現在のURLのパスを取得
const pathname = window.location.pathname;

// パスをスラッシュで分割
const pathSegments = pathname.split('/');

// パスパラメータ（ここではID 1）を取得
const articleId = pathSegments[2];  // '1'

const url = `http://127.0.0.1:8000/popular/${articleId}`;
console.log(articleId);  // '1'


function popularAdd() {
    console.log("popularAdd()")
    fetch(url)
        .then(res => {
            if (res.ok) {
                window.alert("いいねしました。")
            } else {
                window.alert("いいねできませんでした。")
            }
        }
        ).catch(error => {
            console.error('Error:', error);
        });
}