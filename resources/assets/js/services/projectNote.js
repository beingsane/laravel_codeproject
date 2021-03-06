angular.module('app.services')
    .service('ProjectNote', ['$resource', 'appConfig', function ($resource, appConfig) {
        //console.log(appConfig.baseUrl);
        //return [];
        return $resource(appConfig.baseUrl + '/project/:id/note/:idNote', {
            id: '@id',
            idNote: '@idNote'
        }, {
            update: {
                method: 'PUT'
            }
            /*
             ,
             get: {
             transformResponse: function(data,headers){
             var headersGetter = headers();
             if(headersGetter['content-type'] == 'application/json' ||
             headersGetter['content-type'] == 'text/json'){
             var dataJson = JSON.parse(data);
             if(dataJson.hasOwnProperty('data')){
             dataJson = dataJson.data;
             }
             return dataJson[0];
             }

             return data;
             }
             }
             */
        });
    }]);


/*
 Route::get('/{id}/note', 'ProjectNoteController@index');
 Route::post('/{id}/note', 'ProjectNoteController@store');
 Route::get('/{id}/note/{nodeId}', 'ProjectNoteController@show');
 Route::put('/{id}/note/{nodeId}', 'ProjectNoteController@update');
 Route::delete('/{id}/note/{nodeId}', 'ProjectNoteController@destroy');
 get: {
 method: 'GET',
 transformResponse: function(data,headers){
 var headersGetter = headers();
 if(headersGetter['content-type'] == 'application/json' ||
 headersGetter['content-type'] == 'text/json'){
 var dataJson = JSON.parse(data);
 if(dataJson.hasOwnProperty('data')){
 dataJson = dataJson.data;
 }
 return dataJson[0];
 }
 return data;
 }
 }
 */