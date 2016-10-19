/**
 * Created by stephencoulter on 05/10/2016.
 */
function log(name,content,entryDate)
{
    this.logName=name;
    this.logContent=content;
    this.logEntryDate=entryDate;
}
function hasTags(content)
{
    if(content.search('<') >= 0 )
    {
        return true;
    }

    else
    {
        return false;
    }
}

function checkContent(content)
{
    return Boolean(content);
}


function getURL(button)
{
    var URL= window.location;
    console.log(URL);

    switch(button.id)
    {
        case "button1":
            console.log("This is will display some text in the console");

                break;

        case "button2":
            console.log("This is will display some text in the console");

    }

    if(URL.href.includes('java.html'))
    {
        /* window.location='index.html' */
        alert(button.id);
    }

}

function goBack()
{
    window.history.back();
}

function getBrowser()
{
    alert(navigator.userAgent);
}



log.prototype.save=function ()
{
    localStorage.setItem(this.logName, JSON.stringify(this));
};




function createLog()
{

    if (document.getElementById("areaText") == null)
    {
        alert("Cannot find the text box");
    }

    else
    {
        var content = document.getElementById("areaText").value;
        var hasContent = checkContent(content);

        if (hasContent)
        {
            if(hasTags(content))
            {
                alert("Cant save tags. Unsafe");
            }
            else {
                var promptResponse = prompt("Please type in your log name");
                var date = new Date();
                var today = date.getDate();
                var logEntry = new log(promptResponse, content, date);
                logEntry.save();
                var retrieveLog = JSON.parse(localStorage.getItem(promptResponse));
                document.getElementById("output1").innerText = retrieveLog.logName;
                document.getElementById("output2").innerText = retrieveLog.logEntryDate;
                document.getElementById("output3").innerText = retrieveLog.logContent;
            }
        }
        else
        {
            alert("No content");
        }

    }



}

function setImage(image)
{
    image.src = 'dog2.jpg';
}

function resetImage(image)
{
    image.src= 'dog1.jpg';
}

function getLogs() {
    var values = [];
    var keys = Object.keys(localStorage);
    var i = keys.length;

    /* while(i--)
     {
     if(typeof(keys[i])!="undefined")
     {
     console.log(localStorage.getItem(keys[i]));
     }
     } */

    /* do
     {
     if(typeof(keys[i])!="undefined")
     {
     console.log(localStorage.getItem(keys[i]));
     }
     }
     while(i--) */


    /*for(x=0;x<i;x++)
     {
     if(typeof(keys[x])!="undefined")
     {
     console.log(localStorage.getItem(keys[x]));
     }
     } */

    for (x = 0; x < 100; x++) {
        if (x > i) {
            break;
        }

        if (typeof(keys[x]) != "undefined") {
            console.log(localStorage.getItem(keys[x]));
        }
    }

}


function checkUser()
{

    event.preventDefault();
    var form=document.getElementById("inputForm");
    var inputs=form.getElementsByTagName("input");
    var userNameInput=inputs[0];
    var passwordInput=inputs[1];

    console.log(userNameInput.value);
    console.log(passwordInput.value);

    if(userNameInput.value == "Stephen" && passwordInput.value== "Password")
    {
        console.log("success");
        document.cookie="user name = " +userNameInput.value;

        console.log(document.cookie);

    }
    else
    {
        console.log("failed");
    }

}


















