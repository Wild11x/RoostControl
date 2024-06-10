{{-- BASE TEMPLATE --}}
<!doctype html>
<html lang="en">

@include('layout.skeleton.head')

<body>
  <!--  Body Wrapper -->
  @yield('body')
  @include('layout.skeleton.script')
  @yield('script')
  @include('sweetalert::alert')
  @stack('js')
</body>

</html>
