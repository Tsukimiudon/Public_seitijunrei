//real_imageのプレビュー表示
const real_image_input = document.getElementById("real_image_input");
real_image_input.addEventListener("change", function (e) {
  const real_image_file = e.target.files[0];//複数ファイルはfiles配列をループで回す
  const real_image_reader = new FileReader();
  const real_image_preview = document.getElementById("real_image_preview");
  real_image_reader.addEventListener("load", function () {
    real_image_preview.src = real_image_reader.result;
  }, false);

  if (real_image_file) {
    real_image_reader.readAsDataURL(real_image_file);
  }
})


//anime_imageのプレビュー表示
const anime_image_input = document.getElementById("anime_image_input");
anime_image_input.addEventListener("change", function (e) {
  const anime_image_file = e.target.files[0];//複数ファイルはfiles配列をループで回す
  const anime_image_reader = new FileReader();
  const anime_image_preview = document.getElementById("anime_image_preview");
  anime_image_reader.addEventListener("load", function () {
    anime_image_preview.src = anime_image_reader.result;
  }, false);

  if (anime_image_file) {
    anime_image_reader.readAsDataURL(anime_image_file);
  }
})

//anime_imageのプレビュー表示
const eyecatch_input = document.getElementById("eyecatch_input");
eyecatch_input.addEventListener("change", function (e) {
  const eyecatch_file = e.target.files[0];//複数ファイルはfiles配列をループで回す
  const eyecatch_reader = new FileReader();
  const eyecatch_preview = document.getElementById("eyecatch_preview");
  eyecatch_reader.addEventListener("load", function () {
    eyecatch_preview.src = eyecatch_reader.result;
  }, false);

  if (eyecatch_file) {
    eyecatch_reader.readAsDataURL(eyecatch_file);
  }
})

//投稿を削除
function deletePost(id) 
{
    'use strict'
    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
    document.getElementById(`form_${id}`).submit();
    }
}