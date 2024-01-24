# browser-clock-multi
updated version of the browser clock for multiple city display.  This is a nice tool
for a Ham Radio Shack, laboratory, or other place where a large time dashboard is
desired.   Run in a browser and set kiosk full-screen mode for a nice oversized 
time dashboard, displaying multiple cities.  Cities can be changed by updating the 
H2 labels in the multi.htm page.  Offsets are a REST call to /?offset=-5  (where
-5 is eastern time or other time zone offset from UTC).  For regions where the time 
offset is a fraction of an hour (30 minutes or 45 minutes) use x.5  or x.75 respectively, 
where x is the whole hour and the float is either a half or three quarter hour.


# Notes & fix needed
1) clock works in desktop and android browsers just fine.
2) for some reason, it will not render on any browser (safari/chrome, etc) on iOS devices.

If you consider this tool to be useful, and you'd like to help, please submit a pull
request with an iOS fix.   
