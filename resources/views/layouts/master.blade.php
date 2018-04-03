<!DOCTYPE html>
<html lang="en">
  <head>
     @include('includes.header')
  </head>
  <body class="no-skin rtl">
     @include('includes.navbar')
     <div class="main-container ace-save-state" id="main-container">
       @include('includes.sidebar')
        <div class="main-content">
           <!-- <div class="main-content-inner"> -->
              @yield('content')
           <!-- </div> -->
        </div>
        @include('includes.footer')
      </div>
  </body>
</html>




