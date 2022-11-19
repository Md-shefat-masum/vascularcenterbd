<table>
    <tr>
        <td colspan="3">new appoinment mail from vescular</td>
    </tr>
    <tr>
        <td>name</td>
        <td>:</td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <td>email</td>
        <td>:</td>
        <td>{{ $data->email }}</td>
    </tr>
    <tr>
        <td>phone</td>
        <td>:</td>
        <td>{{ $data->phone }}</td>
    </tr>
    <tr>
        <td>date</td>
        <td>:</td>
        <td>{{ \Carbon\Carbon::parse($data->date)->format('d M, Y') }}</td>
    </tr>
    <tr>
        <td>time</td>
        <td>:</td>
        <td>{{ \Carbon\Carbon::parse($data->time)->format('h:i a') }}</td>
    </tr>
    <tr>
        <td>topic</td>
        <td>:</td>
        <td>{{ $data->topic }}</td>
    </tr>
    <tr>
        <td>message</td>
        <td>:</td>
        <td>{{ $data->message }}</td>
    </tr>
    <tr>
        <td>image</td>
        <td>:</td>
        <td>
            <img src="https://vascularcenterbd.com/{{ $data->image }}">
            
        </td>
    </tr>
</table>
