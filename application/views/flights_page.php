<div id="body">
    <table class="container">
        <tr>
            <td>Flight ID</td>
            <td>Model</td>
            <td>Departure</td>
            <td>Arrival</td>
            <td>Departure Time</td>
            <td>Arrival Time</td>
        </tr>
        {flights_model}
        <tr>
            <td>{id}</td>
            <td>{model}</td>
            <td>{departure}</td>
            <td>{arrival}</td>
            <td>{departureTime}</td>
            <td>{arrivalTime}</td>
        </tr>
        {/flights_model}
    </table>
    {flightadd}
</div>