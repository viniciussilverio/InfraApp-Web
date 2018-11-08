if WScript.Arguments.Count = 0 then
    WScript.Echo "Faltando ip"
else

Dim ping
Set objPing = GetObject("winmgmts:{impersonationLevel=impersonate}").ExecQuery("select * from Win32_PingStatus where TimeOut = 10 and address = '" & WScript.Arguments(0) & "'")
For Each objStatus in objPing
If IsNull(objStatus.StatusCode) or objStatus.StatusCode<>0 Then
ping = 0
else
ping = 1
end if
Exit For
next

Dim o
Set o = CreateObject("MSXML2.XMLHTTP")
o.open "GET", "http://localhost:8080/data.php?key=GAIOLINHA1234&ip=" & WScript.Arguments(0) & "&up=" & ping, False
o.send
end if