<%@page import="java.util.Date"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TODAY'S DATE</title>
    </head>
    <%
    Date d=new Date();
%>
    <body>
        <% out.print("This is jsp program for showing date");%>
        <br><br>
        <h2>Today is: <%=d %></h2>
    </body>
</html>