

PORT = 8000;
const axios = require('axios');
const cheerio = require('cheerio');
const express = require('express');

const app = express();

// vendors
const url = 'https://www.amazon.com/s?k=retro+game+console&crid=B4MBN6GFMBAQ&sprefix=retro+%2Caps%2C175&ref=nb_sb_ss_deep-retrain-10-ops-acceptance_2_6';

axios(url) //returns a promise
   .then(resp => {
    const html = resp.data
    // console.log(html)
    const $ = cheerio.load(html)
    const items = [] //empty items array


    $('.rush-component', html).each(function(){
    const title = $(this).text()
    const image = $(this).find('img').attr('src')
    const url = $(this).find('a').attr('href')
    items.push({  // push these things into the empty array
        title,
        image,
        url
    })
  })
  console.log(items)

}).catch(err => console.log(err))
 

app.listen(PORT, () => console.log(`server is running on PORT ${PORT}`));


