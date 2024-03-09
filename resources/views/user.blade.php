<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Choice Question</title>
</head>

<body>
    <h1>Multiple Choice Question</h1>
    <form id="mcq-form" method="post" action="checkanswer">
        @csrf
        @php
            $qno = 1;
        @endphp
        @foreach ($quizzes as $item)
            <input name="correctanswer[]" value="{{ $item->answer }}" hidden>
            <input name="questionId[]" value="{{ $item->qid }}" hidden>

            <p>Question: @php

                echo $qno++;
            @endphp </p>
            <p>{{ $item->question }}</p>

            <input type="radio" id="option1" name="answer[{{ $item->id }}]" value="{{ $item->a1 }}">
            <label for="option1">A. {{ $item->a1 }}</label><br>

            <input type="radio" id="option2" name="answer[{{ $item->id }}]" value="{{ $item->a2 }}">
            <label for="option2">B. {{ $item->a2 }}</label><br>

            <input type="radio" id="option3" name="answer[{{ $item->id }}]" value="{{ $item->a3 }}">
            <label for="option3">C. {{ $item->a3 }}</label><br>

            <input type="radio" id="option4" name="answer[{{ $item->id }}]" value="{{ $item->a4 }}">
            <label for="option4">D. {{ $item->a4 }}</label><br>
        @endforeach
        @if (!empty($results))

            @foreach ($results as $result)
                <b style="color: blue"> {{ $result }}</b> <br>
            @endforeach
        @endif

        <button type="submit" id="checkButton">Submit</button>


    </form>
</body>


</html>
