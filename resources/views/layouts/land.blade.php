<!DOCTYPE html>
<html lang="en">
  <head>
     @include('includes.header')
  </head>
  <body class="no-skin rtl" style="background-color:#f5f8fa">
     @include('includes.navbar')
     <div class="main-container ace-save-state" id="main-container">

        <div class="main-content" style="background-color:#f5f8fa">
           <!-- <div class="main-content-inner"> -->
              @yield('content')
           <!-- </div> -->
        </div>

      </div>
  </body>
</html>
