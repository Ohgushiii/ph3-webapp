<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Webapp</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}"></link>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"></link>
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <!-- header window -->
  <header>
    <div class="header_inner">
      <img src="{{ asset('storage/img/logo.svg') }}" alt="POSSE">
      <span>4th week</span>
    </div>
    <button id="open">記録・投稿</button>
  </header>

  <!-- modal window -->
  <div id="mask" class="hidden"></div>
  <article id="modal" class="hidden">
    <span id="modal_close" class="material-symbols-outlined">
      close</span>
    <section class="study_container">
      <div class="study_inner">
        <div class="study_date">
          <legend class="study_title">学習日</legend>
          <div id="js-studydate"></div>
        </div>
        <div class="study_contents">
          <legend class="study_title">学習コンテンツ(複数選択可)</legend>
          <div id="js-studycontents" class="study_data_check"></div>
          <div class="err_text" id="err_checkbox_content"></div>
        </div>
        <div class="study_language">
          <legend class="study_title">学習言語(複数選択可)</legend>
          <div id="js-studylanguages" class="study_data_check"></div>
          <div class="err_text" id="err_checkbox_lang"></div>
        </div>
      </div>
      <div class="study_inner">
        <div class="study_time">
          <legend class="study_title">学習時間</legend>
          <div id="js-studytime"></div>
        </div>
        <div class="study_comment">
          <legend class="study_title">Twitter用コメント</legend>
          <div id="js-studycomment"></div>
        </div>
        <div class="study_twitter">
        </div>
        <div class="study_twitter">
          <div id="js-studytwitter" class="study_data_check"></div>
        </div>
      </div>
      <button type="submit" id="sp_submit" class="sp_button" onClick="return isCheck()">記録・投稿</button>
    </section>
    <div class="submit_button"><button type="submit" id="submit" onClick="return isCheck()">記録・投稿</button></div>
  </article>

  <!-- calendar window -->
  <section id="calendar" class="hidden" class="calendar_wrapper">
    <div class="cal__main">
      <div class="cal__container">
        <div class="calendar__top">
          <span class="arrow" id="back__arrow">
            << /span>
              <div class="calendar__day">
                <span class="cal__month" id="cal__month"></span>
                <span class="cal__date" id="cal__date"></span>
              </div>
              <span class="arrow" id="next__arrow">></span>
        </div>
        <div class="calendar__bottom">
          <div class="cal__weekdays" id="cal__weekdays">

          </div>
          <div class="cal__days" id="cal__days"></div>
        </div>
      </div>
    </div>

  </section>

  <!-- loading window -->
  <section id="loading" class="hidden">
    <span class="circle"></span>
  </section>

  <!-- completion window -->
  <section id="completion" class="hidden">
    <span id="close" class="material-symbols-outlined">close</span>
    <div class="completion_inner">
      <span>AWESOME!</span>
      <img class="completion_check" src="./assets/img/check_mark-2.png" alt="checkmark">
      <p>記録・投稿<br>完了しました</p>
    </div>
  </section>

  <!-- main  -->
  <main class="learning">
    <section class="learning_record">
      <div class="learning_record_numbers">
        <div class="learning_record_numbers_today">
          <ul>
            <li class="title">Today</li>
            <li class="number">{{ $todayTotalStudyTime }}</li>
            <li class="hour">hour</li>
          </ul>
        </div>
        <div class="learning_record_numbers_month">
          <ul>
            <li class="title">Month</li>
            <li class="number">{{ $monthTotalStudyTime }}</li>
            <li class="hour">hour</li>
          </ul>
        </div>
        <div class="learning_record_numbers_total">
          <ul>
            <li class="title">Total</li>
            <li class="number">{{ $allTotalStudyTime }}</li>
            <li class="hour">hour</li>
          </ul>
        </div>
      </div>
      <div class="learning_record_graph">
        <canvas id="time_chart">
          Canvas not supported...
        </canvas>
      </div>
    </section>
    <section class="learning_function">
      <div class="learning_function_lang">
        <span class="learning_function_title">学習言語</span>
        <div class="chart-inner">
          <canvas id="language_chart">
            Canvas not supported...
          </canvas>
        </div>
      </div>
      <div class="learning_function_contents">
        <span class="learning_function_title">学習言語</span>
        <div class="chart-inner">
          <canvas id="content_chart"></canvas>
        </div>
      </div>
    </section>
  </main>
  <footer class="footer">
    <div class="footer_container">
      <span id="prev" class="material-symbols-outlined">
        navigate_before
      </span>
      <div id="js-date"></div>
      <span id="next" class="material-symbols-outlined">
        navigate_next
      </span>
    </div>
  </footer>
  <button id="sp_open" class="sp_button">記録・投稿</button>

  <!-- 下のmodal.js・graph.jsで読み込むための定数設定 -->
  {{-- <script>
    const contents = JSON.parse('');
    const languages = JSON.parse('');
  </script> --}}
  
  <script>
  var jsonStudyData =@json($jsonStudyData);
  </script>
  

  <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/chart.umd.min.js"></script>
  <script type="module" src="{{ asset('js/chart.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
  <script src="{{ asset('js/calendar.js') }}"></script>
  <script src="{{ asset('js/footer.js') }}"></script>
  <script src="{{ asset('js/modal.js') }}"></script>
  <script src="{{ asset('js/loading.js') }}"></script>
</body>
</html>