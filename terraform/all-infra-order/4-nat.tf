resource "aws_eip" "abp_nat" {
  domain = "vpc"
  tags = {
    Name = "Nat"
  }

}

resource "aws_nat_gateway" "abp_nat" {
  allocation_id = aws_eip.abp_nat.id

  subnet_id = aws_subnet.public_us_east_1b.id
  tags = {
    Name = "nat_for_private_ip_to_communicate_with_internet_through"
  }

  depends_on = [aws_internet_gateway.ab_gateway]
}
