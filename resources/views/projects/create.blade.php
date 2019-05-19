<html>
<head>
  <title>Document</title>
</head>
<body>
  <h1>Crete a new Project</h1>

  <form method="POST" action="/projects">

    {{ csrf_field() }}

    <div>
      {{-- <input type="text" name="title" placeholder="Project title"> --}}
      <input type="text" name="title" placeholder="Project title" value="{{old('title')}}">
    </div>

    <div>
      {{-- <textarea name="description" placeholder="Project description"></textarea> --}}
      <textarea name="description" placeholder="Project description" value="{{old('description')}}"></textarea>
    </div>

    <div>
      <button type="submit">Create Project</button>
    </div>
  </form>

  @include ('errors')

</body>
</html>