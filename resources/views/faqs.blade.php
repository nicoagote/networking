@extends("layouts.logedLayout")

@section("contenidoLog")

<head>

  <title>FAQs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>


<style>
body {
  margin-top: 30px;
  background-color: #eee;
}

.list-group.help-group {
  margin-bottom: 20px;
  padding-left: 0;
  margin: 0;
  .faq-list {
    display: block;
    top: auto;
    margin: 0 0 32px;
    border-radius: 2px;
    border: 1px solid #ddd;
    box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
    .list-group-item {
      position: relative;
      display: block;
      margin: 0;
      padding: 13px 16px;
      background-color: #fff;
      border: 0;
      border-bottom: 1px solid #ddd;
      border-top-left-radius: 2px;
      border-top-right-radius: 2px;
      color: #616161;
      transition: background-color .2s;
      i.mdi {
        margin-right: 5px;
        font-size: 18px;
        position: relative;
        top: 2px;
      }
      &:hover {
        background-color: #f6f6f6;
      }
      &.active {
        background-color: #f6f6f6;
        font-weight: 700;
        color: rgba(0,0,0,.87);
      }
      &:last-of-type {
        border-bottom-left-radius: 2px;
        border-bottom-right-radius: 2px;
        border-bottom: 0;
      }
    }
  }
}

.tab-content.panels-faq {
  padding: 0;
  border: 0;
}

.panel.panel-help {
  box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
  padding-bottom: 0;
  border-radius: 2px;
  overflow: hidden;
  background-color: #fff;
  margin: 0 0 16px;
  a[href^="#"],
  a[href^="#"]:hover,
  a[href^="#"]:focus {
    outline: none;
    cursor: pointer;
    text-decoration: none;
  }
  .panel-heading {
    background-color: #f6f6f6;
    padding: 0 16px;
    line-height: 48px;
    border-top-right-radius: 2px;
    border-top-left-radius: 2px;
    color: rgba(0,0,0,.87);
    h2 {
      margin: 0;
      padding: 14px 0 14px;
      font-size: 18px;
      font-weight: 400;
      line-height: 20px;
      letter-spacing: 0;
      text-transform: none;
    }
  }
  .panel-body {
    background-color: #fff;
    border-top: 1px solid #ddd;
    border-radius: 2px;
    border-top-right-radius: 0;
    border-top-left-radius: 0;
    margin-top: 0;
    p {
      margin: 0 0 16px;
      &:last-of-type {
        margin: 0;
      }
    }
  }
}
</style>

<script type="text/javascript">
$(function() {
      // Since there's no list-group/tab integration in Bootstrap
      $('.list-group-item').on('click',function(e){
          var previous = $(this).closest(".list-group").children(".active");
          previous.removeClass('active'); // previous list-item
          $(e.target).addClass('active'); // activated list-item
      });
    });
</script>

<div class="container"  style="padding-top: 10%;margin-bottom:5%;">
  <div class="col-md-4">
    <ul class="list-group help-group">
      <div class="faq-list list-group nav nav-tabs">
        <a href="#tab1" class="list-group-item active" role="tab" data-toggle="tab">Frequently Asked Questions</a>
        <a href="#tab2" class="list-group-item" role="tab" data-toggle="tab"><i class="mdi mdi-account"></i> My profile</a>
        <a href="#tab3" class="list-group-item" role="tab" data-toggle="tab"><i class="mdi mdi-account-settings"></i> My account</a>
        <a href="#tab4" class="list-group-item" role="tab" data-toggle="tab"><i class="mdi mdi-star"></i> My favorites</a>
        <a href="#tab5" class="list-group-item" role="tab" data-toggle="tab"><i class="mdi mdi-cart"></i> Checkout</a>
        <a href="#tab6" class="list-group-item" role="tab" data-toggle="tab"><i class="mdi mdi-heart"></i> Lorem ipsum</a>
        <a href="#tab7" class="list-group-item" role="tab" data-toggle="tab"><i class="mdi mdi-check"></i> Dolor sit amet</a>
      </div>
    </ul>
  </div>
  <div class="col-md-8">
    <div class="tab-content panels-faq">
      <div class="tab-pane active" id="tab1">
        <div class="panel-group" id="help-accordion-1">
          <div class="panel panel-default panel-help">
            <a href="#opret-produkt" data-toggle="collapse" data-parent="#help-accordion-1">
              <div class="panel-heading">
                <h2>How do I edit my profile?</h2>
              </div>
            </a>
            <div id="opret-produkt" class="collapse in">
              <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nesciunt ut officiis accusantium quisquam minima praesentium, beatae fugit illo nobis fugiat adipisci quia distinctio repellat culpa saepe, optio aperiam est!</p>
                <p><strong>Example: </strong>Facere, id excepturi iusto aliquid beatae delectus nemo enim, ad saepe nam et.</p>
              </div>
            </div>
          </div>
          <div class="panel panel-default panel-help">
            <a href="#rediger-produkt" data-toggle="collapse" data-parent="#help-accordion-1">
              <div class="panel-heading">
                <h2>How do I upload a new profile picture?</h2>
              </div>
            </a>
            <div id="rediger-produkt" class="collapse">
              <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nesciunt ut officiis accusantium quisquam minima praesentium, beatae fugit illo nobis fugiat adipisci quia distinctio repellat culpa saepe, optio aperiam est!</p>
                <p><strong>Example: </strong>Facere, id excepturi iusto aliquid beatae delectus nemo enim, ad saepe nam et.</p>
              </div>
            </div>
          </div>
          <div class="panel panel-default panel-help">
            <a href="#ret-pris" data-toggle="collapse" data-parent="#help-accordion-1">
              <div class="panel-heading">
                <h2>Can I change my phone number?</h2>
              </div>
            </a>
            <div id="ret-pris" class="collapse">
              <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nesciunt ut officiis accusantium quisquam minima praesentium, beatae fugit illo nobis fugiat adipisci quia distinctio repellat culpa saepe, optio aperiam est!</p>
                <p><strong>Example: </strong>Facere, id excepturi iusto aliquid beatae delectus nemo enim, ad saepe nam et.</p>
              </div>
            </div>
          </div>
          <div class="panel panel-default panel-help">
            <a href="#slet-produkt" data-toggle="collapse" data-parent="#help-accordion-1">
              <div class="panel-heading">
                <h2>Where do I change my privacy settings?</h2>
              </div>
            </a>
            <div id="slet-produkt" class="collapse">
              <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nesciunt ut officiis accusantium quisquam minima praesentium, beatae fugit illo nobis fugiat adipisci quia distinctio repellat culpa saepe, optio aperiam est!</p>
                <p><strong>Example: </strong>Facere, id excepturi iusto aliquid beatae delectus nemo enim, ad saepe nam et.</p>
              </div>
            </div>
          </div>
          <div class="panel panel-default panel-help">
            <a href="#opret-kampagne" data-toggle="collapse" data-parent="#help-accordion-1">
              <div class="panel-heading">
                <h2>What is this?</h2>
              </div>
            </a>
            <div id="opret-kampagne" class="collapse">
              <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nesciunt ut officiis accusantium quisquam minima praesentium, beatae fugit illo nobis fugiat adipisci quia distinctio repellat culpa saepe, optio aperiam est!</p>
                <p><strong>Example: </strong>Facere, id excepturi iusto aliquid beatae delectus nemo enim, ad saepe nam et.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="tab2">
        <div class="panel-group" id="help-accordion-2">
          <div class="panel panel-default panel-help">
            <a href="#help-three" data-toggle="collapse" data-parent="#help-accordion-2">
              <div class="panel-heading">
                <h2>Lorem ipsum?</h2>
              </div>
            </a>
            <div id="help-three" class="collapse in">
              <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus nesciunt ut officiis accusantium quisquam minima praesentium, beatae fugit illo nobis fugiat adipisci quia distinctio repellat culpa saepe, optio aperiam est!</p>
                <p><strong>Example: </strong>Facere, id excepturi iusto aliquid beatae delectus nemo enim, ad saepe nam et.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>