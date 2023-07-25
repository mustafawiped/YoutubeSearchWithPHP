# Youtube Search With PHP

This project contains sample codes in PHP that allow you to perform video searches on YouTube using the YouTube Data API v3. With these codes, you can search for any specified text and retrieve the video titles, links, channel names, and other details of the search results in JSON format.

## How to Obtain YouTube Data API v3

To use the YouTube Data API v3, follow the steps below:
- Access the **Google Cloud Console**: https://console.cloud.google.com/
- Create a new project or select an existing one.
- Go to the "APIs & Services" section in the left upper corner.
- Click on "Discover APIs & Services" and find "YouTube Data API v3."
- Enable the API and obtain the necessary credentials.
- While creating the credentials, ensure to set up your project settings and API permissions correctly.
- Get your credentials (API key)

## Usage

1. Obtain your YouTube Data API v3 API key and insert it into the `$apiKey` variable in the `search.php` file.

2. Run the `search.php` file.

3. Send a request in your browser in the following format: `search.php?text=search_text`, where you should replace "search_text" with the text you want to search on YouTube.

4. Retrieve the JSON data obtained from the API request and use the desired information.

## JSON Data Structure

The JSON data obtained from the API request has the following structure:

```json
[
    {
        "videoName": "Video Title 1",
        "videoLink": "https://www.youtube.com/watch?v=videoId1"
    },
    {
        "videoName": "Video Title 2",
        "videoLink": "https://www.youtube.com/watch?v=videoId2"
    },
    ...
]
