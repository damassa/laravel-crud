<x-dash-layout>
    <h1>Insert new serie</h1>
    <form id=create action="/serie" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <td>Plot:</td>
                <td>
                    <textarea name="plot" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="text" name="image" /></td>
            </tr>
            <tr>
                <td>Opening Video:</td>
                <td><input type="text" name="opening_video" /></td>
            </tr>
            <tr>
                <td>Year:</td>
                <td><input type="number" name="year" /></td>
            </tr>
            <tr>
                <td>Duration:</td>
                <td><input type="number" name="duration" /></td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>
                    <select  required min='1' name="category_id">
                        <option value=0 selected placeholder>Choose a category:</option>
                        @foreach($categories as $category)>
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
    </form>
    <input type="submit" value="Create" form='create'/>
    <a href="/dashboard"><button>Cancel</button></a>
</x-dash-layout>
