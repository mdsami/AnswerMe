<!DOCTYPE html>
<html lang="en">
  <head>
     @include('includes.header')
  </head>
  <body class="no-skin">
     <div class="main-container ace-save-state" id="main-container">
        <div class="main-content">
           <div class="main-content-inner">
              @yield('content')
           </div>
        </div>
      </div>
  </body>
</html>