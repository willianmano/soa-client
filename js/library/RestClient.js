function RestClient(apiKey, callbackList) {
    this.apiKey = apiKey;
    this.data;

    this.get = function (url, data){
        var ret = this.send(url, 'GET');
        
        var res = new Object();
        res.status = ret.status;
        res.data = ret.responseText;
        
        return res;
    }

    this.send = function (url, method, data) {
        return $.ajax({
            url: url,
            type: method,
            crossDomain: true,
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: this.beforeSend,
            success:this.success,
            error:this.error,
            complete:this.complete,
            async: false,
            headers: {
                "Authorization": this.apiKey
            }
        });
    }
    this.beforeSend = function(xhr) {
        //xhr.setRequestHeader("Authorization", this.apiKey);
    }
    this.success = function(data) {
        // console.log('Success');
        // console.log(data);
        // this.data = data;
    }
    this.error = function(data) {
        // console.log('error');
        // console.log(data);
    }
    this.complete = function(data) {
        // console.log('complete');
        // console.log(data);
    }
}