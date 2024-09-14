//投稿を削除
function deletePost(id) 
{
    'use strict'
    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
    document.getElementById(`form_${id}`).submit();
    }
}

//スライドショー
const slide = document.getElementById('slide');
const prev = document.getElementById('prev');
const next = document.getElementById('next');
const lists = document.querySelectorAll('.list');
const totalSlides = lists.length;
let count = 0;

// ↓関数を定義

function nextClick() {
  slide.classList.remove( `slide${count % totalSlides + 1}` );
  count++;
  slide.classList.add( `slide${count % totalSlides + 1}` );
}
function prevClick() {
  slide.classList.remove( `slide${count % totalSlides + 1}` );
  count--;
  if (count < 0) count = totalSlides - 1;
  slide.classList.add( `slide${count % totalSlides + 1}` );
}

// ↓クリックイベントのリスナーを登録

next.addEventListener('click', () => {
  nextClick();
});
prev.addEventListener('click', () => {
  prevClick();
});

//自動再生
let autoPlayInterval;
// ↓関数を定義
function startAutoPlay() {
  autoPlayInterval = setInterval(nextClick, 5000);
}
function resetAutoPlayInterval() {
  clearInterval(autoPlayInterval);
startAutoPlay();
}
// ↓自動再生を実行
startAutoPlay();