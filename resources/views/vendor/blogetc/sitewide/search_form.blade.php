<div style='max-width:500px;margin:50px auto;' class='search-form-outer'>
    <form method='get' action='{{route("blogetc.search")}}' class='text-center'>
        <h4>Search for something in our blog:</h4>
        <input style='border:2px solid #FF0000' type='text' name='s' placeholder='Search...' class='form-control' value='{{\Request::get("s")}}'>
        <input type='submit' value='Search' class='btn btn-primary m-2'>
    </form>
</div>