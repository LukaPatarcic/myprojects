import {Observable} from "rxjs/Observable";
import {ReplaySubject} from "rxjs";

var subject = new ReplaySubject(30,200);
subject.subscribe(
    data => addItem('Observer 1: '+data),
    err => addItem(err),
    () => addItem('Observer 1 Completed')
);

var i=1;
var int = setInterval(() => subject.next);

var observable = Observable.create((observer:any) => {
    try {
        observer.next('Hello World');
        observer.next('Hello World2');
        setInterval(() => {
            observer.next('I am good');
        },2000);
        observer.complete();
        observer.next('Hello World');
    }catch (e) {
        observer.error(e)
    }
});

observable.subscribe(
    (x:any) => addItem(x),
    (error:any) => addItem(error),
    () => addItem('Completed')
);

function addItem(val:any) {
    var node = document.createElement('li');
    var textNode = document.createTextNode(val);
    node.appendChild(textNode);
    document.getElementById('output').appendChild(node);
}