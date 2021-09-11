<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Transactions</title>
    <style>
        #update {
            color: rgb(76, 74, 78);
            text-decoration: none;
        }
        #delete {
            color: rgb(168, 29, 29);
            text-decoration: none;
        }
        .transaction-list tbody tr td:nth-child(6) {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 80%;
        }
        tr {
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
    @if(session()->has('update_result'))
        @if (session()->get('update_result'))
            <h4 style="color: green">Transaction updated successfully</h4>
        @else
            <h4 style="color: red">Transaction update failed</h4>
        @endif
    @endif

    @if(session()->has('delete_result'))
        @if (session()->get('delete_result'))
            <h4 style="color: green">Transaction deleted successfully</h4>
        @else
            <h4 style="color: red">Transaction delete failed</h4>
        @endif
    @endif

    <h4>Elapsed time -> {{ $elapsedTime }}</h4>

    <a href="/entry">Add Transaction</a>
    <br><br>

    <table class="transaction-list">
        <tr>
            <td>ID</td>
            <td>Amount</td>
            <td>Transaction Date</td>
            <td>Projection</td>
            <td>Remarks</td>
            <td>Operations</td>
        </tr>
        @foreach ($transactionData as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->transaction_date }}</td>
            <td>{{ $transaction->projection }}</td>
            <td>{{ $transaction->remarks }}</td>
            <td>
                <a class="fa fa-edit fa-lg"  id="update" href="{{ $transaction->id }}"></a>
                <a class="fa fa-trash fa-lg"  id="delete" href="delete/{{ $transaction->id }}"></a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
