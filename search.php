<!DOCTYPE html>
<html>
   <head>
      <title>Search</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="search.css" >
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="search.js?v=1.1"></script>
   </head>
   <body>
      <header>
         <div class="container">
         <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12">
          </div>
         <div class="col-md-3 col-sm-3 col-xs-12">
            <ul class="inline top-ecommerce-icons">
            <li>
               <a href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a>
            </li>
            </ul>
         </div>
      </div>
</div>
      </header>
      <div class="container">
         <div class="main-heading">
            <h3>Stocks</h3>
         </div>
         <div class="search-part">
            <div class="stock-search">
               <h1 class="heading">The easiest way to Buy and stocks Stocks.</h1>
               <p>stock analysis and screening tool for investors in india</p>
               <form>
                  <input type="text" name="query" placeholder="Search.." id="castocksearchInp" autocomplete="off" required>
                  <div class="search-preloader" id="locSearchPreloader" style=""></div>
                  <div id="ca_stocksearch_picker" class="stocksearch-selector">
                     <div class="stocksearch-list" id="pickstocksearchList">
                        <ul id="casearchCodeList">
                        </ul>
                     </div>
                  </div>
            </div>
            </form>
            <div class="search-result hidden">
               <div  id="searchResult"></div>
            </div>
         </div>
      </div>
   </body>
</html>