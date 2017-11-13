<h1>Task # {id}</h1>
<form role="form" action="/info/flights/submit" method="post">
    {fflightId}
    {fmodel}
    {fdepart}
    {farrival}
    {fdtime}
    {fatime}
    {zsubmit}
</form>
<a href="/info/flights/edit"><input type="button" value="Cancel the current edit"/></a>
<a href="/info/flights/delete"><input type="button" value="Delete this todo item"/></a>