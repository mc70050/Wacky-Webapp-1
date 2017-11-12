
<div id="body">
    
    <table class="container">
        <tr>
            <td>Fleet ID</td>
            <td>Manufacturer</td>
            <td>Model</td>
            <td>Price</td>
            <td>Seats</td>
            <td>Reach</td>
            <td>Cruise</td>
            <td>Takeoff</td>
            <td>Hourly</td>
        </tr>
        {planes}
        <tr>
            <td>{id}</td>
            <td>{manufacturer}</td>
            <td>{model}</td>
            <td>{price}</td>
            <td>{seats}</td>
            <td>{reach}</td>
            <td>{cruise}</td>
            <td>{takeoff}</td>
            <td>{hourly}</td>
        </tr>
        {/planes}
    </table>
    
    <p><a href="info/fleet">Info </a></p>
    
</div>
