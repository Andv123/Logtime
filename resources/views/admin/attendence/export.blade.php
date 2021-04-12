<table>
    <thead>
    <tr>
        <th>Stt</th>
        <th>Username</th>
        <th>Fullname</th>
        <th>Date off</th>
        <th>Off time</th>
        <th>Reason</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    @foreach($attendence as $att)
        <tr>
            <td>{{$i}}</td>
            <td>{{$att->user->user_name}}</td>
            <td>{{$att->user->full_name}}</td>
            <td>{{$att->date}}</td>
            <td>{{$att->off_time}}(hours)</td>
            <td>{{$att->reason}}</td>
        </tr>
        <?php $i++; ?>
    @endforeach
    </tbody>
</table>
