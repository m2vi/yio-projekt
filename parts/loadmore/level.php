<section class="portfolio" id="portfolio">
  <!-- Bilderhöhe: 400x400 -->
  <div class="container">
    <h3 class="text-center">All levels</h3>
    <p class="text-center font-italic portfolio-p" onclick="loadAll()">Levels 1-100 are listed here.</p>
    <div id="level-container" class="row">
      <?php require("./parts/loadmore/level-123.php"); ?>
    </div>
    <div class="d-flex justify-content-center text-center pt-5" style="width: 100%;">
      <div class="flex-column" id="loadmore-btn">
        <a onclick="loadMore();" style="cursor: pointer;" class="loadmore">
          <svg width="36px" height="36px" viewBox="0 0 16 16" class="bi bi-chevron-double-down" fill="#03a9f4" xmlns="http://www.w3.org/2000/svg" style="height: 36px !important;">
            <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
          </svg>
          <p class="text-center font-italic loadmore-p">Load More<p>
        </a>
      </div>
    </div>
  </div>
</section>
<script src="./parts/loadmore/loadmore.js"></script>