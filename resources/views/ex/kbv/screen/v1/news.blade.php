@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">
  <div class="content-body" id="news_box_content" data-last-page="{{ $query->lastPage() }}" data-next-page="2">
    @include('ex.kbv.screen.news_card')

  </div>
</div>

@endsection
@section('footer')

<script type="text/javascript">
	$(document).ready( function () {
    initScriptCandidate();
  });

  function initScriptCandidate() {
    var isLoading = true;
    $(window).scroll(function(  ){
      var scrollHeight = $(document).height();
      var scrollPosition = $(window).height() + $(window).scrollTop();

      ajax_url = '/screen/welcome?page=' + $('#news_box_content').data("next-page");

      if ( (scrollHeight - scrollPosition) / scrollHeight === 0 && ($('#news_box_content').data("next-page") <= $('#news_box_content').data("last-page")) && isLoading ) {
        isLoading = false;

        $.ajax({
          url: ajax_url,
        }).done(function (data) {
          if (data) {
            $('#news_box_content').append(data);
            isLoading = true;
          }
        });
        $('#news_box_content').data("next-page", $('#news_box_content').data("next-page") + 1 );
      }
    });
  }
</script>

@endsection
