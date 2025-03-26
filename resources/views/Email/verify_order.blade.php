<div style="border: 3px solid black; padding: 20px; background-color: #f9f9f9;">
    <h3 style="color: black;">Xin chào, {{ $order->user->name }}</h3>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione veritatis quibusdam quod provident laborum aperiam, minus quisquam asperiores accusantium. Earum ea optio expedita assumenda at natus vel voluptates quam iusto.
    </p>
    <h4 style="color: black;">Đơn hàng của bạn</h4>
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 8px;">STT</th>
                <th style="border: 1px solid black; padding: 8px;">Tên sản phẩm</th>
                <th style="border: 1px solid black; padding: 8px;">Giá</th>
                <th style="border: 1px solid black; padding: 8px;">Số lượng</th>
                <th style="border: 1px solid black; padding: 8px;">Tạm tính</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach($order->details as $detail)
            <tr>
                <td style="border: 1px solid black; padding: 8px;">{{ $loop->index + 1 }}</td>
                <td style="border: 1px solid black; padding: 8px;">{{ $detail->product->name }}</td>
                <td style="border: 1px solid black; padding: 8px;">{{ $detail->price }}</td>
                <td style="border: 1px solid black; padding: 8px;">{{ $detail->quantity }}</td>
                <td style="border: 1px solid black; padding: 8px;">{{ number_format($detail->price * $detail->quantity) }}</td>
            </tr>
            <?php $total += $detail->price * $detail->quantity; ?>
            @endforeach
            <tr>
                <td colspan="4" style="text-align: right; border: 1px solid black; padding: 8px;">Tổng tiền</td>
                <td style="border: 1px solid black; padding: 8px;">{{ number_format($total) }}</td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: center; margin-top: 20px;">
        <a href="{{ route('order.verify', $token) }}" style="display: inline-block; padding: 10px 25px; color: #fff; background-color: black; text-decoration: none;">Nhấn vào đây để xác nhận đơn hàng</a>
    </p>
</div>
