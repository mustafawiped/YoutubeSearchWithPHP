local http = require("socket.http")
local ltn12 = require("ltn12")
local json = require("json")

local phpFileUrl = "http://example.com/search.php"

local response = {}
local success, status_code, content, headers = http.request{
    url = phpFileUrl,
    method = "GET",
    sink = ltn12.sink.table(response)
}
if success and status_code == 200 then
    local data = json.decode(table.concat(response))
    for i, item in ipairs(data) do
        local videoName = item[1]
        local videoLink = item[2]
        print("Video Name: " .. videoName)
        print("Video Link: " .. videoLink)
        print("-----------------------")
    end
else
    print("Error: Unable to fetch data from the PHP file.")
end
